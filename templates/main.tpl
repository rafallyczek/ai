<html>
    
<head>
    <title>{$page_title|default:"Tytuł domyślny"}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="{$config->app_url}/css/main.css" />
    <link rel="stylesheet" href="{$config->app_url}/css/my-styles.css" />
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
            
            {if !isset($login)}
            <!-- Nav -->
            <nav id="nav">
		<ul class="red">
                    <li class="current"><a href="{$config->app_root}/app/security/logout.php">Wyloguj</a></li>
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