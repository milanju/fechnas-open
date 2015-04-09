<!DOCTYPE html>
<html lang="en" dir="ltr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="robots" content="noindex">
<meta name="referrer" content="origin-when-crossorigin">
<title>Export: opendb - Adminer</title>
<link rel="stylesheet" type="text/css" href="?file=default.css&amp;version=4.2.1">
<script type="text/javascript" src="?file=functions.js&amp;version=4.2.1"></script>
<link rel="shortcut icon" type="image/x-icon" href="?file=favicon.ico&amp;version=4.2.1">
<link rel="apple-touch-icon" href="?file=favicon.ico&amp;version=4.2.1">

<body class="ltr nojs" onkeydown="bodyKeydown(event);" onclick="bodyClick(event);">
<script type="text/javascript">
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = 'You are offline.';
</script>

<div id="help" class="jush-sql jsonly hidden" onmouseover="helpOpen = 1;" onmouseout="helpMouseout(this, event);"></div>

<div id="content">
<p id="breadcrumb"><a href=".">MySQL</a> &raquo; <a href='?username=root' accesskey='1' title='Alt+Shift+1'>Server</a> &raquo; <a href="?username=root&amp;db=opendb">opendb</a> &raquo; Export
<h2>Export: opendb</h2>
<div id='ajaxstatus' class='jsonly hidden'></div>

<form action="" method="post">
<table cellspacing="0">
<tr><th>Output<td><label><input type='radio' name='output' value='text' checked>open</label><label><input type='radio' name='output' value='file'>save</label><label><input type='radio' name='output' value='gz'>gzip</label>
<tr><th>Format<td><label><input type='radio' name='format' value='sql' checked>SQL</label><label><input type='radio' name='format' value='csv'>CSV,</label><label><input type='radio' name='format' value='csv;'>CSV;</label><label><input type='radio' name='format' value='tsv'>TSV</label>
<tr><th>Database<td><select name='db_style'><option selected><option>USE<option>DROP+CREATE<option>CREATE</select><label><input type='checkbox' name='routines' value='1'>Routines</label><label><input type='checkbox' name='events' value='1'>Events</label><tr><th>Tables<td><select name='table_style'><option><option selected>DROP+CREATE<option>CREATE</select><label><input type='checkbox' name='auto_increment' value='1'>Auto Increment</label><label><input type='checkbox' name='triggers' value='1' checked>Triggers</label><tr><th>Data<td><select name='data_style'><option><option>TRUNCATE+INSERT<option selected>INSERT<option>INSERT+UPDATE</select></table>
<p><input type="submit" value="Export">
<input type="hidden" name="token" value="710527:685491">

<table cellspacing="0">
<thead><tr><th style='text-align: left;'><label class='block'><input type='checkbox' id='check-tables' onclick='formCheck(this, /^tables\[/);'>Tables</label><th style='text-align: right;'><label class='block'>Data<input type='checkbox' id='check-data' onclick='formCheck(this, /^data\[/);'></label></thead>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='bracket_ro1' onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">bracket_ro1</label><td align='right'><label class='block'><span id='Rows-bracket_ro1'></span><input type='checkbox' name='data[]' value='bracket_ro1' onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='bracket_ro1024' onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">bracket_ro1024</label><td align='right'><label class='block'><span id='Rows-bracket_ro1024'></span><input type='checkbox' name='data[]' value='bracket_ro1024' onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='bracket_ro128' onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">bracket_ro128</label><td align='right'><label class='block'><span id='Rows-bracket_ro128'></span><input type='checkbox' name='data[]' value='bracket_ro128' onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='bracket_ro16' onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">bracket_ro16</label><td align='right'><label class='block'><span id='Rows-bracket_ro16'></span><input type='checkbox' name='data[]' value='bracket_ro16' onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='bracket_ro2' onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">bracket_ro2</label><td align='right'><label class='block'><span id='Rows-bracket_ro2'></span><input type='checkbox' name='data[]' value='bracket_ro2' onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='bracket_ro2048' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">bracket_ro2048</label><td align='right'><label class='block'><span id='Rows-bracket_ro2048'></span><input type='checkbox' name='data[]' value='bracket_ro2048' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='bracket_ro256' onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">bracket_ro256</label><td align='right'><label class='block'><span id='Rows-bracket_ro256'></span><input type='checkbox' name='data[]' value='bracket_ro256' onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='bracket_ro32' onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">bracket_ro32</label><td align='right'><label class='block'><span id='Rows-bracket_ro32'></span><input type='checkbox' name='data[]' value='bracket_ro32' onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='bracket_ro4' onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">bracket_ro4</label><td align='right'><label class='block'><span id='Rows-bracket_ro4'></span><input type='checkbox' name='data[]' value='bracket_ro4' onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='bracket_ro512' onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">bracket_ro512</label><td align='right'><label class='block'><span id='Rows-bracket_ro512'></span><input type='checkbox' name='data[]' value='bracket_ro512' onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='bracket_ro64' onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">bracket_ro64</label><td align='right'><label class='block'><span id='Rows-bracket_ro64'></span><input type='checkbox' name='data[]' value='bracket_ro64' onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='bracket_ro8' onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">bracket_ro8</label><td align='right'><label class='block'><span id='Rows-bracket_ro8'></span><input type='checkbox' name='data[]' value='bracket_ro8' onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='data' onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">data</label><td align='right'><label class='block'><span id='Rows-data'></span><input type='checkbox' name='data[]' value='data' onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='participants' onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">participants</label><td align='right'><label class='block'><span id='Rows-participants'></span><input type='checkbox' name='data[]' value='participants' onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='ro16' onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">ro16</label><td align='right'><label class='block'><span id='Rows-ro16'></span><input type='checkbox' name='data[]' value='ro16' onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='ro8' onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">ro8</label><td align='right'><label class='block'><span id='Rows-ro8'></span><input type='checkbox' name='data[]' value='ro8' onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='users' onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">users</label><td align='right'><label class='block'><span id='Rows-users'></span><input type='checkbox' name='data[]' value='users' onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<script type='text/javascript'>ajaxSetHtml('?username=root&db=opendb&script=db');</script>
</table>
</form>
<p><a href='?username=root&amp;db=opendb&amp;dump=bracket%25'>bracket</a></div>

<form action='' method='post'>
<div id='lang'>Language: <select name='lang' onchange="this.form.submit();"><option value="en" selected>English<option value="ar">العربية<option value="bn">বাংলা<option value="ca">Català<option value="cs">Čeština<option value="da">Dansk<option value="de">Deutsch<option value="es">Español<option value="et">Eesti<option value="fa">فارسی<option value="fr">Français<option value="hu">Magyar<option value="id">Bahasa Indonesia<option value="it">Italiano<option value="ja">日本語<option value="ko">한국어<option value="lt">Lietuvių<option value="nl">Nederlands<option value="no">Norsk<option value="pl">Polski<option value="pt">Português<option value="pt-br">Português (Brazil)<option value="ro">Limba Română<option value="ru">Русский язык<option value="sk">Slovenčina<option value="sl">Slovenski<option value="sr">Српски<option value="ta">த‌மிழ்<option value="th">ภาษาไทย<option value="tr">Türkçe<option value="uk">Українська<option value="vi">Tiếng Việt<option value="zh">简体中文<option value="zh-tw">繁體中文</select> <input type='submit' value='Use' class='hidden'>
<input type='hidden' name='token' value='881139:906047'>
</div>
</form>
<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="Logout" id="logout">
<input type="hidden" name="token" value="710527:685491">
</p>
</form>
<div id="menu">
<h1>
<a href='http://www.adminer.org/' target='_blank' id='h1'>Adminer</a> <span class="version">4.2.1</span>
<a href="http://www.adminer.org/#download" target="_blank" id="version"></a>
</h1>
<script type="text/javascript" src="?file=jush.js&amp;version=4.2.1"></script>
<script type="text/javascript">
var jushLinks = { sql: [ '?username=root&db=opendb&table=$&', /\b(bracket_ro1|bracket_ro1024|bracket_ro128|bracket_ro16|bracket_ro2|bracket_ro2048|bracket_ro256|bracket_ro32|bracket_ro4|bracket_ro512|bracket_ro64|bracket_ro8|data|participants|ro16|ro8|users)\b/g ] };
jushLinks.bac = jushLinks.sql;
jushLinks.bra = jushLinks.sql;
jushLinks.sqlite_quo = jushLinks.sql;
jushLinks.mssql_bra = jushLinks.sql;
bodyLoad('5.5');
</script>
<form action="">
<p id="dbs">
<input type="hidden" name="username" value="root"><span title='database'>DB</span>: <select name='db' onmousedown='dbMouseDown(event, this);' onchange='dbChange(this);'><option value=""><option>information_schema<option>dbname<option>mysql<option selected>opendb<option>performance_schema</select><input type='submit' value='Use' class='hidden'>
<input type="hidden" name="dump" value=""></p></form>
<p class='links'><a href='?username=root&amp;db=opendb&amp;sql='>SQL command</a>
<a href='?username=root&amp;db=opendb&amp;import='>Import</a>
<a href='?username=root&amp;db=opendb&amp;dump=' id='dump' class='active '>Export</a>
<a href="?username=root&amp;db=opendb&amp;create=">Create table</a>
<p id='tables' onmouseover='menuOver(this, event);' onmouseout='menuOut(this);'>
<a href="?username=root&amp;db=opendb&amp;select=bracket_ro1" class='select'>select</a> <a href="?username=root&amp;db=opendb&amp;table=bracket_ro1" title='Show structure'>bracket_ro1</a><br>
<a href="?username=root&amp;db=opendb&amp;select=bracket_ro1024" class='select'>select</a> <a href="?username=root&amp;db=opendb&amp;table=bracket_ro1024" title='Show structure'>bracket_ro1024</a><br>
<a href="?username=root&amp;db=opendb&amp;select=bracket_ro128" class='select'>select</a> <a href="?username=root&amp;db=opendb&amp;table=bracket_ro128" title='Show structure'>bracket_ro128</a><br>
<a href="?username=root&amp;db=opendb&amp;select=bracket_ro16" class='select'>select</a> <a href="?username=root&amp;db=opendb&amp;table=bracket_ro16" title='Show structure'>bracket_ro16</a><br>
<a href="?username=root&amp;db=opendb&amp;select=bracket_ro2" class='select'>select</a> <a href="?username=root&amp;db=opendb&amp;table=bracket_ro2" title='Show structure'>bracket_ro2</a><br>
<a href="?username=root&amp;db=opendb&amp;select=bracket_ro2048" class='select'>select</a> <a href="?username=root&amp;db=opendb&amp;table=bracket_ro2048" title='Show structure'>bracket_ro2048</a><br>
<a href="?username=root&amp;db=opendb&amp;select=bracket_ro256" class='select'>select</a> <a href="?username=root&amp;db=opendb&amp;table=bracket_ro256" title='Show structure'>bracket_ro256</a><br>
<a href="?username=root&amp;db=opendb&amp;select=bracket_ro32" class='select'>select</a> <a href="?username=root&amp;db=opendb&amp;table=bracket_ro32" title='Show structure'>bracket_ro32</a><br>
<a href="?username=root&amp;db=opendb&amp;select=bracket_ro4" class='select'>select</a> <a href="?username=root&amp;db=opendb&amp;table=bracket_ro4" title='Show structure'>bracket_ro4</a><br>
<a href="?username=root&amp;db=opendb&amp;select=bracket_ro512" class='select'>select</a> <a href="?username=root&amp;db=opendb&amp;table=bracket_ro512" title='Show structure'>bracket_ro512</a><br>
<a href="?username=root&amp;db=opendb&amp;select=bracket_ro64" class='select'>select</a> <a href="?username=root&amp;db=opendb&amp;table=bracket_ro64" title='Show structure'>bracket_ro64</a><br>
<a href="?username=root&amp;db=opendb&amp;select=bracket_ro8" class='select'>select</a> <a href="?username=root&amp;db=opendb&amp;table=bracket_ro8" title='Show structure'>bracket_ro8</a><br>
<a href="?username=root&amp;db=opendb&amp;select=data" class='select'>select</a> <a href="?username=root&amp;db=opendb&amp;table=data" title='Show structure'>data</a><br>
<a href="?username=root&amp;db=opendb&amp;select=participants" class='select'>select</a> <a href="?username=root&amp;db=opendb&amp;table=participants" title='Show structure'>participants</a><br>
<a href="?username=root&amp;db=opendb&amp;select=ro16" class='select'>select</a> <a href="?username=root&amp;db=opendb&amp;table=ro16" title='Show structure'>ro16</a><br>
<a href="?username=root&amp;db=opendb&amp;select=ro8" class='select'>select</a> <a href="?username=root&amp;db=opendb&amp;table=ro8" title='Show structure'>ro8</a><br>
<a href="?username=root&amp;db=opendb&amp;select=users" class='select'>select</a> <a href="?username=root&amp;db=opendb&amp;table=users" title='Show structure'>users</a><br>
</div>
<script type="text/javascript">setupSubmitHighlight(document);</script>
