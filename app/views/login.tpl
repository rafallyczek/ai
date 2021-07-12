<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
	<meta charset="utf-8"/>
	<title>Logowanie</title>
</head>

<body>
    
    {if $msgs->isError()}
        <ul>
        {foreach $msgs->getMessages() as $msg}
            {if $msg->isError()}
            <li>{$msg->text}</li>
            {/if}
        {/foreach}
        </ul>
    {/if}
    
    {if $msgs->isInfo()}
        <ul>
        {foreach $msgs->getMessages() as $msg}
            {if $msg->isInfo()}
            <li>{$msg->text}</li>
            {/if}
        {/foreach}
        </ul>
    {/if}
    
    <form method="post" action="{url action='login'}">
        <label for="login">Login: </label>
	<input type="text" name="login" id="login" placeholder="Login" {if isset($login)}value="{$login}"{/if}/>
        <label for="login">Hasło: </label>
	<input type="text" name="password" id="password" placeholder="Hasło" />
        <input type="submit" class="green" value="Zaloguj" />
    </form>
    
</body>

</html>