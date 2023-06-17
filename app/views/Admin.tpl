{extends file="adminTMP.tpl"}

{block name=content}
    <div id="#wyniki_meczy">
        <center><h2>Wprowadź/Aktualizuj wynik meczu</h2></center>
        <form method="post" action="wstawWynikMeczu">
            <table>
            {foreach $tab as $linia}
                <tr>
                    <td>{$linia["druz1"]}</td>
                    <td><input type="text" name="wynik{$linia["id_mecz"]}" style="text-align: center;" value="{$linia["wynik"]}"></td>
                    <td>{$linia["druz2"]}</td>
                    <td>{$linia["data"]}</td>
                </tr>
            {/foreach}
            </table>
            <center><input type="submit" value="Ustaw wyniki"></center>  
        </form>
    </div>
            
    <div id="#mecze">
        <center><h2>Usuń mecz</h2></center>
        <form method="post" action="usunMecz">
            <table>
            {foreach $tab as $linia}
                <tr>
                    <td>{$linia["druz1"]}</td>
                    <td>{$linia["wynik"]}</td>
                    <td>{$linia["druz2"]}</td>
                    <td>{$linia["data"]}</td>
                </tr>
            {/foreach}
            </table>
            <input list="doUsuniecia" style="width: 40%;" name="doUsuniecia"/>
            <datalist id="doUsuniecia">
                {foreach $tab as $linia}
                    <option value="{$linia["data"]} => {$linia["druz1"]}-{$linia["druz2"]} {$linia["id_mecz"]}">
                {/foreach}
            </datalist>
            <input type="submit" value="Usuń Mecz">  
        </form>
        
        <center><h2>Dodaj mecz</h2></center>
        <form method="post" action="dodajMecz">
            <input list="druzyna_1" name="druzyna_1"/>
            <datalist id="druzyna_1">
                {foreach $tab as $linia}
                    <option value="{$linia["druz1"]}">
                {/foreach}
            </datalist>
            <input list="druzyna_2" name="druzyna_2"/>
            <datalist id="druzyna_2">
                {foreach $tab as $linia}
                    <option value="{$linia["druz1"]}">
                {/foreach}
            </datalist>
            <input type="datetime-local" name="data"><br><br>
            <input type="submit" value="Dodaj Mecz">  
        </form>            
    </div>
            
    <div id="#gracze_i_role">
                <center><h2>Usuń użytkownika/rolę</h2></center>
                <table>
                {foreach $uzytk as $linia}
                    <tr>
                        <td>{$linia["id_uzytkownik"]}</td>
                        <td>{$linia["nick"]}</td>
                        <td>{foreach $linia["rola"] as $linia2}{$linia2} {/foreach}</td>
                        <td>{$linia["imie"]}</td>
                        <td>{$linia["nazwisko"]}</td>
                    </tr>
                {/foreach}
                </table>
                <form method="post" action="usunUzytkownika">
                    <input list="usunUzytkownik" name="usunUzytkownik"/>
                    <datalist id="usunUzytkownik">
                    {foreach $pureUzytk as $linia}
                        <option value="{$linia["nick"]} => {$linia["id_uzytkownik"]}">
                    {/foreach}
                    </datalist>
                    <input type="submit" value="Usuń użytkownika">
                </form>
                <form method="post" action="usunRole">
                    <input list="komuOdebracRole" name="komuOdebracRole"/>
                    <datalist id="komuOdebracRole">
                    {foreach $pureUzytk as $linia}
                        <option value="{$linia["nick"]} => {$linia["id_uzytkownik"]}">
                    {/foreach}
                    </datalist>
                    <input list="jakaOdebracRole" name="jakaOdebracRole"/>
                    <datalist id="jakaOdebracRole">
                    {foreach $role as $linia}
                        <option value="{$linia["nazwa"]}">
                    {/foreach}
                    </datalist>
                    <input type="submit" value="Usuń rolę">
                </form>
                <center><h2>Dodaj użytkownika/rolę</h2></center>
                <form method="post" action="dodajUzytkownika">
                    <input type="text" style="width: 30%;" name="nowyUzytkownikNick" value="podaj nazwę użytkownika"/>
                    <input type="text" style="width: 30%;" name="nowyUzytkownikImie" value="podaj imię użytkownika"/>
                    <input type="text" style="width: 30%;" name="nowyUzytkownikNazwisko" value="podaj nazwisko użytkownika"/>
                    <input type="text" style="width: 30%;" name="nowyUzytkownikHaslo" value="podaj hasło użytkownika"/><br><br>
                    <input type="submit" value="Dodaj użytkownika">
                </form><br><br>
                <form method="post" action="dodajRole">
                    <input list="komuDodacRole" name="komuDodacRole"/>
                    <datalist id="komuDodacRole">
                    {foreach $pureUzytk as $linia}
                        <option value="{$linia["nick"]} => {$linia["id_uzytkownik"]}">
                    {/foreach}
                    </datalist>
                    <input list="jakaDodacRole" name="jakaDodacRole"/>
                    <datalist id="jakaDodacRole">
                    {foreach $role as $linia}
                        <option value="{$linia["nazwa"]}">
                    {/foreach}
                    </datalist>
                    <input type="submit" value="Dodaj rolę">
                </form>
    </div>
            
    <div id="#reprezentacje">
        <center><h2>Usuń reprezentacje</h2></center>
        <form method="post" action="usunReprezentacje">
            <table>
            {foreach $rep as $linia}
                <tr>
                    <td>{$linia}</td>
                </tr>
            {/foreach}
            </table>
            <input list="usunRep" style="width: 30%;" name="usunRep"/>
            <datalist id="usunRep">
                {foreach $rep as $linia}
                    <option value="{$linia}">
                {/foreach}
            </datalist><br><br>
            <input type="submit" value="Usuń reprezentacje">
        </form>
        
        <center><h2>Dodaj reprezentacje</h2></center>
        <form method="post" action="dodajReprezentacje">
            <input type="text" style="width: 30%;" name="nowaDruzyna" value="podaj nazwę reprezentacji"/><br><br>
            <input type="submit" value="Dodaj Reprezentacje">  
        </form>
    </div>
{/block}