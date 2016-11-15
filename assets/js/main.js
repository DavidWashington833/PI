$(document).ready(function() {
    // AREA
    $('.data-edit-area').click(function()  {
        var edit = $(this).attr("data-edit-area");
        edit = edit.split("|");
        newArea.value = edit[0];
        idArea.value = edit[1];
    });

    // ASSUNTO
    $('.data-edit-assunto').click(function()  {
        var edit = $(this).attr("data-edit-assunto");
        edit = edit.split("|");
        newAssunto.value = edit[0];
        idAssunto.value = edit[2];
    });

    // QUESTAO
    $('.data-edit-questao').click(function()  {
        var edit = $(this).attr("data-edit-questao");
        edit = edit.split("|");
        newQuestao.value = edit[0];
        idQuestao.value = edit[1];
    });
});