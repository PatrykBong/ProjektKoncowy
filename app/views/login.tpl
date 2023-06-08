{extends file="loginTMP.tpl"}

{block name=content}
    <form method="post" action="login">
	<div class="fields">
            <div class="field">
                <label for="name">Login:</label>
                <input type="text" name="login" id="name" />
            </div>
            <div class="field">
                <label for="email">Hasło:</label>
                <input type="text" name="haslo" id="email" />
            </div>
	</div>
	<ul class="actions">
            <li><input type="submit" value="Zaloguj" /></li>
	</ul>
    </form>
    {if $msgs->isInfo() || $msgs->isError() || $msgs->isWarning()}
        <ul>
        {foreach $msgs->getMessages() as $msg}
            <li>{$msg->text}</li>
        {/foreach}
        </ul>
    {/if}
{/block}