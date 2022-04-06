<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact V5</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/vendor/noui/nouislider.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="container-contact100">
    <div class="wrap-contact100">
        <form class="contact100-form validate-form">
				<span class="contact100-form-title">
					Index İsteği Gönder
				</span>

            <div class="wrap-input100 validate-input bg1" data-validate="Lütfen şifreyi girin.">
                <span class="label-input100">Şifre *</span>
                <input value="{{ $_SESSION["website"] }}" class="input100" type="text" name="website" placeholder="Şifrenizi girin">
            </div>

            <div id="inputs">
                <div class="wrap-input100 validate-input bg1" data-validate="Lütfen şifreyi girin.">
                    <span class="label-input100">Website Adresi</span>
                    <input class="input100" type="text" name="urls[]" placeholder="Indexletmek istediğiniz adresi girin">
                </div>
            </div>
            <span class="add-input" onclick="addInput()">İnput ekle</span>

            <div class="container-contact100-form-btn">
                <button class="contact100-form-btn">
						<span>
							Submit
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
                </button>
            </div>
        </form>
    </div>
</div>
</body>

<script type="text/javascript">
    function addInput() {
        var div = document.createElement("div");
        div.setAttribute('class', 'wrap-input100 validate-input bg1');
            var span = document.createElement("span");
            span.setAttribute('class', 'label-input100');
            span.innerHTML = 'Website Adresi';
            div.appendChild(span);

            var input = document.createElement("input");
            input.setAttribute('type', 'text');
            input.setAttribute('name', 'urls[]');
            input.setAttribute('class', 'input100');
            input.setAttribute('placeholder', 'Indexletmek istediğiniz adresi girin.');
            div.appendChild(input);

            var parent = document.getElementById("inputs");
            parent.appendChild(div);
    }
</script>
</html>