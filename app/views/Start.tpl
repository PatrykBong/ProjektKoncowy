{extends file="mainTMP.tpl"}

{block name=content}
    <div  style="all: unset; width: 65%; float: left; padding-left: 8px;">
        Witaj 
        {if isset($imieGracza)}
            {$imieGracza}
        {else}
            Gościu
        {/if}
        , witamy na naszej stronie, czas wytypować parę wyników :)<br><br>
        {if isset($punktyGracza)}
            <h4>Twoje punkty: {$punktyGracza}</h4>
        {else}
            Zapraszamy do <a style="all: unset; color:red;" href="{$conf->action_url}login">zalogowania się</a>
        {/if}
        
    </div>
    <div  style="all: unset; float: left;">
        <center>
        <ul style="list-style-type:none;">
            <li><h2>Najbliższe mecze:</h2></li>
        {foreach $przyszleMecze as $mecz}
            <li><h6>{$mecz["druz1"]}-{$mecz["druz2"]} {$mecz["data"]}</h6></li>
        {/foreach}
        </ul></center>
    </div>
        <br><br><br><br><br><br>
{/block}