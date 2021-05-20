{extends file="../templates/main.tpl"}

{block name=content}
    
    <div class="title">Kalkulator</div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-12-medium">

                <!-- Form -->
                <section>
                    <form method="post" action="{$app_url}/app/calc_currency.php">
                        <div class="row gtr-50">
                            <div class="col-6 col-12-small">
                                <label for="amount">Kwota: </label>
                                <input type="text" name="amount" id="amount" placeholder="PLN" {if isset($form['amount'])}value="{$form['amount']}"{/if}/>
                                <label for="currency">Waluta: </label>
                                <select id="currency" name="currency">
                                    <option value="EUR"{if (isset($form['currency']) && $form['currency']=='EUR')}selected{/if}>Euro</option>
                                    <option value="USD"{if (isset($form['currency']) && $form['currency']=='USD')}selected{/if}>Dolar amerykański</option>
                                    <option value="JPY"{if (isset($form['currency']) && $form['currency']=='JPY')}selected{/if}>Jen</option>
                                    <option value="GBP"{if (isset($form['currency']) && $form['currency']=='GBP')}selected{/if}>Brytyjski funt szterling</option>
                                </select>
                            </div>
                            <div class="col-6 col-12-small">
                                {if isset($messages)}
                                    {if count($messages) > 0}       
                                        <label for="error">Wynik: </label>
                                        <ol id="error" style="padding: 10px 10px 10px 30px; border-radius: 5px; background-color: rgb(140, 38, 38); color:#fff; width:300px;">
                                            {foreach  $messages as $msg}
                                                {strip}
                                                    <li>{$msg}</li>
                                                {/strip}
                                            {/foreach}       
                                        </ol>
                                    {/if}
                                {/if}
                                
                                {if isset($result)}
                                <label for="result">Wynik: </label> 
                                <div id="result" style="padding: 10px; border-radius: 5px; background-color: #4d94ff; color:#fff; width:300px;">
                                    <p style="margin: 0;">{$form['amount']} PLN to: {$result} {$form['currency']}</p>
                                </div>
                                {/if}

                            </div>
                            <div class="col-6 col-12-small">
                                <ul class="actions">
                                    <li><input type="submit" class="green" value="Oblicz" /></li>
                                </ul>
                            </div>
                        </div>
                    </form>
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