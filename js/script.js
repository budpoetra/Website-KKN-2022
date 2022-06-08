$(document).ready(function() {

    $("#tambahEL").click(function() {
        $("#barang").append('<div class="row g-3 align-items-center"><label for="merkSepatu" class="col-sm-2 col-form-label">Barang</label><div class="col-auto"><input type="text" id="merkSepatu" class="form-control" placeholder="Merk Sepatu" aria-describedby="passwordHelpInline"></div><div class="col-auto"><div class="col-sm"><select name="menu" id="menu" class="selectpicker form-control" data-live-search="true"><option selected>~ Menu ~</option><option value="SC">Shoes : Cleaning</option><option value="SPC">Shoes : Premium Cleaning</option><option value="SEC">Shoes : Expert Cleaning</option><option value="RU">Repaint : Unyellowing</option><option value="RBC">Repaint : Basic Colour</option><option value="RL">Repaint : Leather</option><option value="CR1">Costem Repaint : 1 Colour</option><option value="CR2">Costem Repaint : 2 Colour</option><option value="CR3">Costem Repaint : 3-4 Colour</option><option value="FREE">FREE</option></select></div></div></div><br>');
    });

    $("#hitung").click(function() {

        const merk = document.querySelectorAll('#merkSepatu');
        const allMenu = document.querySelectorAll('#menu');
        let val = [];
        let valDesc = [];
        let total = 0;

        for (let i = 0; i < merk.length; i++) {
            valDesc.push(merk[i].value + " (" + allMenu[i].value + ")");
        }
        const string = valDesc.join('; ');

        for (let i = 0; i < allMenu.length; i++) {
            if (allMenu[i].value === 'SC') {
                val.push(25000);
            }
            if (allMenu[i].value === 'SPC') {
                val.push(30000);
            }
            if (allMenu[i].value === 'SEC') {
                val.push(40000);
            }
            if (allMenu[i].value === 'RU') {
                val.push(70000);
            }
            if (allMenu[i].value === 'RBC') {
                val.push(75000);
            }
            if (allMenu[i].value === 'RL') {
                val.push(120000);
            }
            if (allMenu[i].value === 'CR1') {
                val.push(80000);
            }
            if (allMenu[i].value === 'CR2') {
                val.push(120000);
            }
            if (allMenu[i].value === 'CR3') {
                val.push(150000);
            }
            if (allMenu[i].value === 'FREE') {
                val.push(0);
            }
        }
        for(i = 0; i < val.length; i++){
            total += val[i];
        }

        $("#formInput").append('<label for="desc" class="col-sm-2 col-form-label">Deskripi</label><div class="col-sm-10"><input type="text" class="form-control" id="desc" name="desc" placeholder="Deskripi" readonly required></div>');
        $("#desc").attr("value", string);

        $("#formInput").append('<label for="total" class="col-sm-2 col-form-label">Total</label><div class="col-sm-10"><input type="text" class="form-control" id="total" name="total" placeholder="Total" readonly required></div>');
        $("#total").attr("value", total);

        $("#hitung").remove();
        $("form").append('<button type="submit" name="submit" class="btn btn-primary">Input</button>');

    });

});