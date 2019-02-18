<!--modal alert message-->
<div id="modal_alert_message" class="modal" style="margin-top:15%" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-exclamation-triangle" style="color:red;font-size:16px"></i> Alerta</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="alert_message_text" style="color:black"></p>
            </div>
            <div class="modal-footer">
                <button id="accept_modal_alert_message" type="button" class="btn btn-info" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--modal success message-->
<div id="modal_success_message" class="modal" style="margin-top:15%" tabindex="-2" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-check" style="color:green;font-size:16px"></i> Sucesso</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="success_message_text" style="color:black"></p>
            </div>
            <div class="modal-footer">
                <button id="accept_modal_success_message" type="button" class="btn btn-info" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!--modal confirm message with dinamic all to yes-function-->
<div id="modal_confirm_message" class="modal" style="margin-top:15%" tabindex="-2" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-question" style="color:blue;font-size:16px"></i> Confirmação</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="confirm_message_text" style="color:black"></p>
            </div>
            <div class="modal-footer">
                <button id="decline_modal_confirm_message" type="button" class="btn btn-warning" data-dismiss="modal">Declinar</button>
                <button id="accept_modal_confirm_message" type="button" class="btn btn-info" data-dismiss="modal">Confirmnar</button>
            </div>
        </div>
    </div>
</div>

