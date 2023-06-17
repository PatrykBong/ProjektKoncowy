{extends file="mainTMP.tpl"}

{block name=content}
    <form method="post" action="typuj">
        <table>
        <tr><td>mecz</td><td>typ</td><td>data</td><td></td></tr>
            {foreach $tabela as $linia}
                <tr>
                    <td style="display: none;"><input type="text" name="id{$linia["id_mecz"]}" value="{$linia["id_mecz"]}"></td>
                    <td style="display: none;"><input type="text" name="data{$linia["id_mecz"]}" value="{$linia["data"]}"></td>
                    <td>{$linia["druz1"]}-{$linia["druz2"]}</td>
                    <td>{if (strtotime($linia['data']))-strtotime(date("Y:m:d H:i:s"))>3600}
                            <input type="text" name="wynik{$linia["id_mecz"]}" value="{$linia["typ"]}">
                        {else}
                            <input disabled='disabled' style='background-color: #848484;' type="text" name="wynik{$linia["id_mecz"]}" value="{$linia["typ"]} <czas na typowanie minął>">
                        {/if}</td>
                    <td>{$linia["data"]}</td>
                    <td>{if (strtotime($linia['data']))-strtotime(date("Y:m:d H:i:s"))>3600}
                            <input type="submit" value="Wyślij wynik" />
                        {else}
                            <input disabled='disabled' style='background-color: #848484;' type="submit" value="Wyślij wynik" />
                        {/if}</td>
                </tr>
            {/foreach}
        </table>
    </form>
{/block}