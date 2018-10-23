<div class="panel panel-default gf-newsletter gf-newsletter--home">
    <div class="panel-body gf-newsletter__body">
        <p class="gf-newsletter__title"></p>
        <div class="tnp tnp-subscription-minimal ">
            <form action="https://nss-devel.ha.rs/?na=s" method="post">
                <input type="hidden" name="nr" value="minimal">
                <input type="hidden" name="nlang" value="">
                <input class="tnp-email" type="email" required="" name="ne" value="" placeholder="Email" title="Ovo polje mora biti popunjeno" oninvalid="this.setCustomValidity('Neispravna email adresa')" oninput="this.setCustomValidity('')">
                <input class="tnp-submit" type="submit" value="Prijavi se">
                <label class="mt-1"><input type="checkbox" checked>Želim da primam obaveštenja o specijalnim promocijama na email</label>

                <div class="tnp-privacy-field">

                    <label><input type="checkbox" name="ny" required="" class="tnp-privacy" title="Da bi ste nastavili morate čekirati ovo polje" oninvalid="this.setCustomValidity('Morate prihvatiti politiku privatnosti')" onchange="this.setCustomValidity('')">&nbsp;<a target="_blank" href="https://nss-devel.ha.rs/politika-privatnosti-2/">Prihvatam politiku privatnosti</a></label></div>
            </form>
        </div>
<!--        --><?php //echo do_shortcode( '[newsletter_form form="1" type="minimal"]' ); ?>
    </div>
</div>
