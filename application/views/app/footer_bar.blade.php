<footer>

    <div class="footer-content">

        <div class="container">

            <div class="footer-content-body">
                <p>Version : <strong>0.1</strong></p>
                <p>Temps de chargement : <span id="time"><strong>100</strong> ms</span></p>
            </div>

        </div>

    </div>

</footer>
<script>

    var cls = 'danger';

    var time = performance.now();

    if(time <= 800)
    {
        cls = 'success';
    }
    else if(time > 800 && time <= 1500)
    {
        cls = 'warning';
    }

    document.getElementById('time').innerHTML = '<strong class="' + cls + '">' + parseInt(performance.now())   + '</strong> ms';

</script>