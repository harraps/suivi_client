<div class="row">
    <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
        <div class="page-header">
            <h1>Projet</h1>
        </div>
    </div>
</div>

<form class="row">
    <div class="col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 well">
        <div class="form-horizontal">
            
            <div class="form-group">
                <label for="inputTitle" class="col-sm-3 control-label">Nom</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                </div>
            </div>
            
            <h2><br/></h2>
            
            <!-- TODO génération d'une liste d'utilisateurs -->
            <span class="help-block">Ajoutez les utilisateurs qui travailleront sur le projet.</span>
            <table class="table table-striped table-hover ">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Prénom</th>
                        <th>Nom</th>
                        <th>Entreprise</th>
                        <th>+</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Column content</td>
                        <td>Column content</td>
                        <td>Column content</td>
                        <td><input type="checkbox"></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Column content</td>
                        <td>Column content</td>
                        <td>Column content</td>
                        <td><input type="checkbox"></td>
                    </tr>
                    <tr class="info">
                        <td>3</td>
                        <td>Column content</td>
                        <td>Column content</td>
                        <td>Column content</td>
                        <td><input type="checkbox"></td>
                    </tr>
                    <tr class="success">
                        <td>4</td>
                        <td>Column content</td>
                        <td>Column content</td>
                        <td>Column content</td>
                        <td><input type="checkbox"></td>
                    </tr>
                    <tr class="danger">
                        <td>5</td>
                        <td>Column content</td>
                        <td>Column content</td>
                        <td>Column content</td>
                        <td><input type="checkbox"></td>
                    </tr>
                    <tr class="warning">
                        <td>6</td>
                        <td>Column content</td>
                        <td>Column content</td>
                        <td>Column content</td>
                        <td><input type="checkbox"></td>
                    </tr>
                    <tr class="active">
                        <td>7</td>
                        <td>Column content</td>
                        <td>Column content</td>
                        <td>Column content</td>
                        <td><input type="checkbox"></td>
                    </tr>
                </tbody>
            </table>
            
            <div class="text-center">
                <ul class="pagination pagination-sm">
                    <li class="disabled"><a href="#">«</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">»</a></li>
                </ul>
            </div>
            
            <h2><br/></h2>
            
            <div class="form-group">
                <div class="col-sm-12">
                    <div class="pull-right">
                        <button type="reset" class="btn btn-default">Annuler</button>
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</form>