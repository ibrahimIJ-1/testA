<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = false;

    var pusher = new Pusher('264946c748fe34d48411', {
        cluster: 'ap2'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
        // console.log(data);
        $('#tableBody').append(getContent(data.message));
    });

    function getContent(data) {
        content = `<tr> <th scope="row">${data.id}</th>`;
        content += `<td>${data.TotalAmount}</td>`
        // content += `<td>${data.Amount}</td>`
        // content += `<td>${data.CardHolder}</td>`
        // content += `<td>${data.CardTypeName}</td>`
        content += `<td>${data.TerminalId}</td>`
        content += `<td>${data.MerchantName}</td></tr>`
        return content;
    }
</script>
