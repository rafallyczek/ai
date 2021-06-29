{extends file="main.tpl"}

{block name=content}
    
    <div class="title">Historia</div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-12-medium">

		<section>
                    <table class="pure-table pure-table-bordered">
                        <thead style="background-color: #8c8c8c;">
                            <tr>
                                <th>Kwota</th>
                                <th>Waluta</th>
                                <th>Wynik</th>
                                <th>Użytkownik</th>
                                <th>Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            {foreach $result as $wynik}
                            <tr>
                                <td>{$wynik['kwota']}</td>
                                <td>{$wynik['waluta']}</td>
                                <td>{$wynik['wynik']}</td>
                                <td>{$wynik['user']}</td>
                                <td>{$wynik['data']}</td>
                            </tr>    
                            {/foreach}
                        </tbody>
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