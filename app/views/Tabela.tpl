{extends file="mainTMP.tpl"}

{block name=content}
    <center><h1> TABELA WYNIKÓW </h1></center>
    <table>
    {foreach $tabela as $linia}
        <tr><td>{$linia["imie"]} {$linia["nazwisko"]}</td><td>{$linia["punkty"]}</td></tr>
    {/foreach}
    </table>
{/block}