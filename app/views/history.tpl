{extends file="main.tpl"}

{block name=content}

    <style>
        table, th, td {
          border: 1px solid #56585d;
          border-collapse: collapse;
          padding: 5px;   
        }
        th{
            font-weight: bold;
        }
    </style>
    
    <div class="title">Historia</div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-12-medium">

		<section>
                    <table>
                        <tr>
                            <th>Kwota</th>
                            <th>Waluta</th>
                            <th>Wynik</th>
                            <th>Użytkownik</th>
                            <th>Data</th>
                        </tr>
                        {foreach $result as $wynik}
                        <tr>
                            <td>{$wynik['kwota']}</td>
                            <td>{$wynik['waluta']}</td>
                            <td>{$wynik['wynik']}</td>
                            <td>{$wynik['user']}</td>
                            <td>{$wynik['data']}</td>
                        </tr>    
                        {/foreach}
                    </table>
		</section>

            </div>
        </div>
        <div id="copyright">
            <ul>
                <li>&copy; Rafał Łyczek.</li><li>Projekt szablonu: <a href="http://html5up.net">HTML5 UP</a></li>
            </ul>
        </div>
    </div>
    
{/block}