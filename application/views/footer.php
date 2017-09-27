<div id="darker" style="width:100%; display:none; height:100%; background-color:rgba(0,0,0,0.8); position:fixed; top:0px; left:0px; z-index:65541;"></div>

<div id="loginForm" style="display:none; position:fixed; top:100px; left:calc(50% - 150px); width:300; z-index:65542; padding:20px; background-color:rgb(52, 62, 72);">
	<div style="font-size:20px; font-weight:bold; color:#ffffff; margin-bottom:20px;">LOGIN</div>

	<form id="lForm" method="POST">
		<div style="margin-top:10px; font-size:13px; color:#ffffff;">Login</div>
		<div style="margin-top:5px;">
			<input type="text" name="login" id="Llogin" style="border:none; font-size:17px; padding:10px; background-color:#ffffff; width:300px;"/>
		</div>

		<div style="margin-top:15px; font-size:13px; color:#ffffff;">Password</div>
		<div style="margin-top:5px;">
			<input type="password" name="pass" id="Lpass" style="border:none; font-size:17px; padding:10px; background-color:#ffffff; width:300px;"/>
		</div>
		<div id="Lerror" style="margin-top:30px; display:none; padding:10px; background-color:#ff5050; color:#ffffff;">
		</div>
		<div style="margin-top:20px;">
			<div onclick="login('<?=$base_url?>', $('#Llogin').val(), $('#Lpass').val());" style="background-color: #1A8FC4;    display: inline-block;    padding: 7px;    padding-left: 25px;    padding-right: 25px;    color: #ffffff;    font-size: 16px;    text-align: center;    cursor: pointer;    margin-top: 10px;">ENTER</div>
		</div>
	</form>
</div>

<div id="regaForm" style="display:none; position:fixed; top:60px; left:calc(50% - 150px); width:300; z-index:65542; padding:20px; background-color:rgb(52, 62, 72);">
	<div style="font-size:20px; font-weight:bold; color:#ffffff; margin-bottom:20px;">REGISTRATION</div>
	<form id="rForm" method="POST">
		<div style="margin-top:10px; font-size:13px; color:#ffffff;">Login</div>
		<div style="margin-top:5px;">
			<input type="text" name="login"  id="Rlogin" style="border:none; font-size:17px; padding:10px; background-color:#ffffff; width:300px;"/>
		</div>

		<div style="margin-top:10px; font-size:13px; color:#ffffff;">Email</div>
		<div style="margin-top:5px;">
			<input type="text" name="email"  id="Remail" style="border:none; font-size:17px; padding:10px; background-color:#ffffff; width:300px;"/>
		</div>

		<div style="margin-top:15px; font-size:13px; color:#ffffff;">Password</div>
		<div style="margin-top:5px;">
			<input type="password" name="pass"  id="Rpass" style="border:none; font-size:17px; padding:10px; background-color:#ffffff; width:300px;"/>
		</div>

		<div style="margin-top:15px; font-size:13px; color:#ffffff;">Password repeat</div>
		<div style="margin-top:5px;">
			<input type="password" name="pass2"  id="Rpass2" style="border:none; font-size:17px; padding:10px; background-color:#ffffff; width:300px;"/>
		</div> 
		<div id="Rerror" style="margin-top:30px; padding:10px; display:none; background-color:#ff5050; color:#ffffff;">
		</div>
		<div style="margin-top:20px;">
			<div onclick="rega('<?=$base_url?>', $('#Rlogin').val(), $('#Rpass').val(), $('#Rpass2').val(), $('#Remail').val());" style="background-color: #1A8FC4;    display: inline-block;    padding: 7px;    padding-left: 25px;    padding-right: 25px;    color: #ffffff;    font-size: 16px;    text-align: center;    cursor: pointer;    margin-top: 10px;">REGISTRATION</div>
		</div>
	</form>
</div>

</body>
</html>