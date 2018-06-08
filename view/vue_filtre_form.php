<div class="filt ">
    <form
     action="index.php" method="post">
        <div style="padding-left: 10%;">
            <div style="padding-bottom: 4%" class="row">
                <div class="col-md-11 col-sm-11 col-lg-11">
                    <div class="md-form">
                        <div class="md-form">
                            <h2 style='color: #666e76'><strong>FILTRE</strong></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-11 col-sm-11 col-lg-11">
                    <div class="md-form">
                        <div class="md-form">
                            <p>Type de bien :</p>
                            <select  name="type" class="col-10 form-control form-control-lg">
                                <option>Tout selectionner</option>
                                <option  value="appartement">appartement</option>
                                <option  value="maison">maison</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-11 col-sm-11 col-lg-11">
                    <div class="md-form">
                        <div class="md-form">
                            Prix minimum : <input class="col-8" type="number" name="filter_prix_min">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-11 col-sm-11 col-lg-11">
                    <div class="md-form">
                        <div class="md-form">
                            Prix maximum : <input class="col-8" type="number" name="filter_prix_max">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-11 col-sm-11 col-lg-11">
                    <div class="md-form">
                        <div class="md-form">
                            Ville :<br> <input class="col-8" type="text" name="filter_ville">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-11 col-sm-11 col-lg-11">
                    <div class="md-form">
                        <div class="md-form">
                            Nombre de pièces : <input class="col-8" type="number" name="filter_piece">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-11 col-sm-11 col-lg-11">
                    <div class="md-form">
                        Surface du terrain : <input class="col-8" type="number" name="filter_surface_du_terrain">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-11 col-sm-11 col-lg-11">
                    <div class="md-form">
                        Surface m² : <input class="col-8" type="number" name="filter_surface">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-11 col-sm-11 col-lg-11">
                    <div class="md-form">
                        Chambres : <input class="col-8" type="number" name="filter_chambre">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-11 col-sm-11 col-lg-11">
                    <div class="md-form">
                        Salles d'eaux : <input class="col-8" type="number" name="filter_eaux">
                    </div>
                </div>
            </div>
        </div>
        <div style="padding-left:10%; padding-bottom:10% ">
            <div class="row">
                <div class="col-md-11 col-sm-11 col-lg-11">
                    <label for="form1" class="custom-control custom-checkbox">
                        <input id="form1" type="checkbox" class="custom-control-input"  name="filter_cave">
                        <span class="custom-control-indicator"></span>
                        Cave
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-11 col-sm-11 col-lg-11">
                    <label for="form2" class="custom-control custom-checkbox">
                        <input id="form2" type="checkbox" class="custom-control-input" name="filter_grenier">
                        <span class="custom-control-indicator"></span>
                        Grenier
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-11 col-sm-11 col-lg-11">
                    <label for="form3" class="custom-control custom-checkbox">
                        <input id="form3" type="checkbox" class="custom-control-input"  name="filter_ascenseur">
                        <span class="custom-control-indicator"></span>
                        Ascenseur
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-11 col-sm-11 col-lg-11">
                    <label for="form4" class="custom-control custom-checkbox">
                        <input id="form4" type="checkbox" class="custom-control-input"   name="filter_balcon">
                        <span class="custom-control-indicator"></span>
                        Balcon
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="col-md-11 col-sm-11 col-lg-11">
                    <label for="form5" class="custom-control custom-checkbox">
                        <input id="form5" type="checkbox" class="custom-control-input"   name="filter_place_parking">
                        <span class="custom-control-indicator"></span>
                        place de parking
                    </label>
                </div>
            </div>
        </div>
        <center>
            <input type="submit" name="search_filtre" value="Rechercher" style='background-color: black'
                   class=" btn-lg btn">
        </center>
    </form>
</div>