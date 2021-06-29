<html>
<head>
    <title>{$page_title|default:"Tytuł domyślny"}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="{$config->app_url}/css/main.css" />
    <link rel="stylesheet" href="{$config->app_url}/css/my-styles.css" />
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css" integrity="sha384-Uu6IeWbM+gzNVXJcM9XV3SohHtmWE+3VGi496jvgX1jyvDTXfdK+rfZc8C1Aehk5" crossorigin="anonymous">
</head>
<body class="homepage is-preload">
    <div id="page-wrapper">
        
        <!-- Header -->
	<section id="header" class="wrapper">

            <!-- Logo -->
            <div id="logo">
		<h1>{$page_title|default:"Tytuł domyślny"}</h1>
		<p>{$page_description|default:"Opis domyślny"}</p>
            </div>
            
            {if isLogged()}
            <!-- Nav -->
            <nav id="nav">
                <ul>
                    <li class="current"><a href="{$config->action_root}calcShow">Kalkulator</a></li>
		</ul>
                {if isAdmin()}
                <ul>
                    <li class="current"><a href="{$config->action_root}history">Historia</a></li>
		</ul>
                {/if}
                <ul class="red">
                    <li class="current"><a href="{$config->action_root}logout">Wyloguj</a></li>
		</ul>
            </nav>
            {/if}
                    
	</section>
                
        <section id="footer" class="wrapper">
            {block name=content} Domyślna treść zawartości .... {/block}
        </section>
        
    </div>
</body>    
</html>