<div class="modal fade" id="loginErrorModal" tabindex="-1" role="dialog" aria-labelledby="SettingsLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Inviaci pure un tuo feedback!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="" method="POST" class="login-form">
                <div class="modal-body">
                    <div class="form-group text-start">
                        <span class="mb-3 ms-1">Inserisci la tua e-mail:</span>
                        <input type="email" class="form-control rounded-left mb-3" name="email" placeholder="E-mail" required>
                        <span class="mb-3 ms-1">Inserisci il tuo commento:</span>
                        <textarea name="emailText" id="emailText" cols="30" rows="7" class="form-control rounded-left" placeholder="Scrivi qui il tuo commento" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary rounded-pill submit py-2 px-4" data-dismiss="modal" role="button">Annulla</a>
                    <button type="submit" class="btn btn-primary rounded-pill submit py-2 px-4" name="submit" id="button">Invia</button>
                </div>
            </form>
        </div>
    </div>
</div>