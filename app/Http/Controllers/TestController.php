<?php

namespace App\Http\Controllers;

use App\Events\ShowNotification;
use App\Models\Batch;
use App\Models\CardsReport;
use App\Models\SummaryReport;
use App\Models\Terminal;
use App\Models\Transaction;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batches = Batch::all();
        return view('dashboard.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->all() as $newBatch) {
            $summary = json_decode($newBatch['SummaryReport'], true);
        // $summary = $request->SummaryReport;
        if (!$this->checkTerminalExists($newBatch['TerminalId'])) {
            $terminal = Terminal::create([
                'merchant_name' => $summary['Merchant'],
                'terminal_id' => intval($newBatch['TerminalId']),
            ]);
        } else {
            $terminal = Terminal::where('terminal_id', '=', $newBatch['TerminalId'])->get()->first();
        }
        if (!$this->checkBatchExists($newBatch['BatchId'])) {
            $batch = Batch::create([
                'batch_id' => $newBatch['BatchId'],
                'BatchNumber' => $newBatch['BatchNumber'],
                'Mmname' => $newBatch['Mmname'],
                'terminal_id' => $terminal->id,
                'TotalAmount' => $newBatch['TotalAmount'],
                'DateOfClosing' => date('Y-m-d:H:i:s', strtotime($newBatch['DateOfClosing'])),
                'DateOfCreating' => date('Y-m-d:H:i:s', strtotime($newBatch['DateOfCreating'])),
            ]);
            $summaryR = SummaryReport::create([
                'batch_id' => $batch->id,
                'merchant' => $summary['Merchant'],
                'location' => $summary['Location'],
                // 'app_config_name' => $summary['AppConfigName'],
                'tpn' => $summary['Tpn'],
                'report_type' => $summary['ReportType'],
                // 'open_date' => date('Y-m-d:H:i:s', strtotime($summary['OpenDate'])),
                'batch_number' => $summary['BatchNumber'],
                // 'batch_idt' => $summary['BatchId'],
                // 'close_date' => date('Y-m-d:H:i:s', strtotime($summary['CloseDate'])),
            ]);
            foreach ($summary['CardReports'] as $item) {
                CardsReport::create([
                    'summary_report_id' => $summaryR->id,
                    'TypeName' => $item['TypeName'],
                    'PaymentTypeName' => $item['PaymentReports'][0]['PaymentTypeName'],
                    // 'SubTotalAmount' => $item['PaymentReports'][0]['SubTotalAmount'],
                    // 'SubTotalAmountFormatted' => $item['PaymentReports'][0]['SubTotalAmountFormatted'],
                    // 'SurchargeAmount' => $item['PaymentReports'][0]['SurchargeAmount'],
                    // 'SurchargeAmountFormatted' => $item['PaymentReports'][0]['SurchargeAmountFormatted'],
                    'TotalAmount' => $item['PaymentReports'][0]['TotalAmount'],
                    'TotalNumber' => $item['PaymentReports'][0]['TotalNumber'],
                ]);
            }
        } else {
            $batch = Batch::where('batch_id', '=', $newBatch['BatchId'])->get()->first();
        }

        foreach ($newBatch['ListOfTransactions'] as $transaction) {
            if (!$this->checkTransactionExists($transaction)) {
                Transaction::create([
                    'transaction_id' => $transaction,
                    'batch_id' => $batch->id,
                    'terminal_id' => $terminal->id,
                ]);
            }
        }
        }
        



        $message = ['id' => $summary['Tpn'], 'TotalAmount' => $request->TotalAmount, 'TerminalId' => $request->TerminalId, 'MerchantName' => $summary['Merchant']];
        // $message = $request->all();
        Log::alert($request->all());
        // $message = ['id' => 'asdasdad2234234242r24234-24', 'TotalAmount' => 500, 'TerminalId' => '4322234', 'MerchantName' => 'hello word'];

        event(new ShowNotification($message));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function checkTerminalExists($terminal)
    {
        $terminal = Terminal::where('terminal_id', '=', $terminal)->get()->first();
        if ($terminal != null) {
            return true;
        } else {
            return false;
        }
    }

    public function checkBatchExists($batch)
    {
        $terminal = Batch::where('batch_id', '=', $batch)->get()->first();
        if ($terminal != null) {
            return true;
        } else {
            return false;
        }
    }
    public function checkTransactionExists($transaction)
    {
        $terminal = Transaction::where('transaction_id', '=', $transaction)->get()->first();
        if ($terminal != null) {
            return true;
        } else {
            return false;
        }
    }
}
