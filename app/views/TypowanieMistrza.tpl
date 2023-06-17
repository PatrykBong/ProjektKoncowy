{extends file="mainTMP.tpl"}

{block name=content}
    <form method="post" action="typujMistrza">
	<div class="fields">
            <div class="field">
                {if isset($typMUzytkownika)}
                <input list="druzyna" name="druzyna" value="{$typMUzytkownika}"/>
                {else}
                <input list="druzyna" name="druzyna"/>
                {/if}
                <datalist id="druzyna">
                    {foreach $listaReprezentacji as $linia}
                        <option value="{$linia["nazwa"]}">
                    {/foreach}
                </datalist>
            </div>
	</div>
	<ul class="actions">
            {if strtotime($dataPierwszegoMeczu)-strtotime(date("Y:m:d H:i:s"))<3600 }
                <li><input type="submit" disabled="disabled" value="Typuj" /></li>
                <!--<li><input type="submit" value="Typuj" /></li>-->
            {else}
                <li><input type="submit" value="Typuj" /></li>
            {/if}
	</ul>
    </form>
    {if $msgs->isInfo() || $msgs->isError() || $msgs->isWarning()}
        <ul>
        {foreach $msgs->getMessages() as $msg}
            <li>{$msg->text}</li>
        {/foreach}
        </ul>
    {/if}
    
    {if strtotime($dataPierwszegoMeczu)-strtotime(date("Y:m:d H:i:s"))<3600 }
        <table>
        {foreach $tabelaTNM as $linia}
            {if $linia["w_turnieju"] == 1}
                <tr>
                    <td>{$linia["nazwa"]}</td><td>{$linia["ile"]}</td>
                </tr>
            {else}
                <tr style="background-color: #ffbb99">
                    <td>{$linia["nazwa"]}</td><td>{$linia["ile"]}</td>
                </tr>
            {/if}
        {/foreach}
        </table>    
    {/if}
{/block}