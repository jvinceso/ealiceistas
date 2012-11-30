<script type="text/javascript" src='<?php echo URL_JS; ?>contacto/contacto.js'></script>
<div class="page-content">
    <!-- 2 cols -->
    <div class="one-half">
        <h4 style="color: #0099CC !important;"><cufon class="cufon cufon-canvas" alt="ENVIAR " style="width: 52px; height: 24px;"><canvas width="68" height="27" style="width: 68px; height: 27px; top: -5px; left: -1px;"></canvas><cufontext>ENVIAR </cufontext></cufon><cufon class="cufon cufon-canvas" alt="MENSAJE" style="width: 71px; height: 24px;"><canvas width="82" height="27" style="width: 82px; height: 27px; top: -5px; left: -1px;"></canvas><cufontext>MENSAJE</cufontext></cufon></h4>
        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugamet, ante. </p>
        <!-- form -->
        <form method="post" action="#" id="contactForm">
            <fieldset>
                <p>
                    <label>NAME:</label>
                    <input type="text" id="name" name="name">
                </p>
                <p>
                    <label>EMAIL:</label>
                    <input type="text" id="email" name="email">
                </p>
                <p>
                    <label>WEB:</label>
                    <input type="text" id="web" name="web">
                </p>
                <p>
                    <label>COMMENTS:</label>
                    <textarea cols="20" rows="5" id="comments" name="comments"></textarea>
                </p>

                <!-- send mail configuration -->
                <input type="hidden" id="to" name="to" value="luis@luiszuno.com">
                <input type="hidden" id="from" name="from" value="youremail@luiszuno.com">
                <input type="hidden" id="subject" name="subject" value="From torn wordpress online">
                <input type="hidden" id="sendMailUrl" name="sendMailUrl" value="send-mail.php">
                <!-- ENDS send mail configuration -->

                <p><input type="button" id="submit" name="submit" value="SEND"></p>
            </fieldset>
            <p class="warning" id="error" style="display: none;">Message</p>
        </form>
        <p class="success" id="success" style="display: none;">Thanks for your comments.</p>
        <!-- ENDS form -->

    </div>
    <div class="one-half last">
        <h4 style="color: #0099CC !important;"><cufon class="cufon cufon-canvas" alt="UBICACION DE LA" style="width: 52px; height: 24px;"><canvas width="68" height="27" style="width: 68px; height: 27px; top: -5px; left: -1px;"></canvas><cufontext>UBICACION DE LA</cufontext></cufon><cufon class="cufon cufon-canvas" alt="INSTITUCION" style="width: 71px; height: 24px;"><canvas width="82" height="27" style="width: 82px; height: 27px; top: -5px; left: -1px;"></canvas><cufontext>INSTITUCION</cufontext></cufon></h4>
        <p>Pellentest condimentum, eros ipsum rutrum orci, sagittis tempus.</p>
        <div id="map" style="width: 450px;height: 385px;"></div>

        <p>Chambers St 1254 New York City<br>
            USA ZIP 44511<br>
            (33) 1234 5677, (33) 12459876<br>
            <a href="mailto:email@server.com">email@server.com</a>
        </p>
    </div>
    <div class="clear "></div>
    <!-- ENDS 2 cols -->

</div>