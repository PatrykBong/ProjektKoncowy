{extends file="mainTMP.tpl"}

{block name=content}
    <style>
        table, tr, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
    
    <table>
    {foreach $tabela as $linia}
        <tr>
        {foreach $linia as $li}
        <td colspan="2" style="width:11%;">{$li}</td>
        {/foreach}
        </tr>
    {/foreach}
    
    {foreach $tabela2 as $linia2}
        <tr>
        {$new = 0}
        {foreach $linia2 as $li2}
            {if $new > 1}
                {if $li2 == 3}
                <td style="background-color:#ff9900;    ">{$li2}</td>
                {elseif $li2 == 1}
                <td style="background-color:#ffff66;">{$li2}</td>
                {elseif $li2 == 0}
                <td style="background-color:#ffd6d6;">{$li2}</td>
                {else}
                <td>{$li2}</td>
                {/if}
            {else}
                {if is_numeric($li2)}
                    <td style="background-color:#6fff66;">{$li2}</td>
                {else}
                    <td>{$li2}</td>
                {/if}
            {/if}
        <p style="display: none">{$new++}</p>
        {/foreach}
        </tr>
    {/foreach}
    </table>
{/block}