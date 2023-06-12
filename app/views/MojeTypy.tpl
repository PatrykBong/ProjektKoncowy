{extends file="mainTMP.tpl"}

{block name=content}
    <form method="post" action="typuj"><table>
        <tr><td>mecz</td><td>typ</td><td>data</td><td></td></tr>
        {foreach $tabela as $linia}
                <tr>
                    <td style="display: none;"><input type="text" name="id{$linia["id_mecz"]}" value="{$linia["id_mecz"]}"></td>
                    <td>{$linia["druz1"]}-{$linia["druz2"]}</td>
                    <td><input type="text" name="wynik{$linia["id_mecz"]}" value="{$linia["typ"]}"></td>
                    <td>{$linia["data"]}</td>
                    <td><input type="submit" value="Wyślij wynik" /></td>
                </tr>
        {/foreach}
    </table></form>
{/block}