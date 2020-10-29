
<body>

  <div class="content fground">

      <form id="feedback-form" role="form" method="post" action="contact">
        @csrf
                        <input type="text" name="name" id="name" placeholder="vards">
                        <input type="email" name="email" id="email" placeholder="e-pasts">
                        <input type="text" name="content" id="content" placeholder="jautajums"></textarea>
                        <div id="widget_server_response"></div>
                        <div class="buttons">
                            <button class="btn btn-primary" type="submit">Submit</button><!--
                            --><button class="btn btn-secondary" type="reset">Reset</button>
                    </form>

  </div>
  <span class="text-danger">© Copyright 2020 Karlis</span>
  <footer class="footer"></footer>
</body>
