<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
	<meta charset="utf-8"/>
	<title>Lista książek | Amelia framework</title>
</head>

<body>
    
    {if $msgs->isInfo()}
        <ul>
        {foreach $msgs->getMessages() as $msg}
            <li>{$msg->text}</li>
        {/foreach}
        </ul>
    {/if}

    <a href="{url action='login'}">Action: login</a>
    
    <br/>
    
    <a href="{url action='logout'}">Action: logout</a>
    
    <br/>
    
    <a href="{url action='book_list'}">Action: book_list</a>
    
    <br/>
    
    <a href="{url action='book_details'}">Action: book_details</a>
    
    <br/>
    
    <a href="{url action='book_review'}">Action: book_review</a>
    
    <br/>
    
    <a href="{url action='book_delete'}">Action: book_delete</a>
    
    <br/>
    
    <a href="{url action='book_edit'}">Action: book_edit</a>
    
    <br/>
    
    <a href="{url action='book_add'}">Action: book_add</a>
    
</body>

</html>