
$(document).ready(function(){

    if (($("select[name=category_id]").val() == 99) && ($("select[name=subject_id]").val() == 999)) {
        $("#subject-div").hide();
    }

    $("select[name=category_id]").bind("change", function() {

        // Update subjects select list based on category

        var categoryId = $(this).val();

        if (categoryId == 99) {
            $("select[name=subject_id]").val(999);
            $("#subject-div").hide();
        } else {

            var url = '/admin/json/category-subjects/'+categoryId;

            $.ajax({
                type:  "GET",
                url: url,
                data: {},
                success: function(data) {
                    var options = '<option value="999">NO SUBJECT</option>';
                    for ( var i = 0; i < data.length; i++) {
                        options += '<option value="'+data[i]['id']+'">'+data[i]['name']+'</option>';
                    }
                    $("select[name=subject_id]").html(options);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("Error occurred getting subjects.");
                    console.log("error " + textStatus);
                    console.log("incoming Text " + jqXHR.responseText);
                    return false;
                }
            });

            $("#subject-div").show();
        }
    })

});

function replaceSeparatorCharacters(search, replace, subject) {

    switch (search) {
        case '\n':
            subject = subject.replace(/\\n/g, replace);
            break;
        case '\t':
            subject = subject.replace(/\\t/g, replace);
            break;
        case '|':
            subject = subject.replace(/\|/g, replace);
            break;
        case ',':
            subject = subject.replace(/,/g, replace);
            break;
        case ';':
            subject = subject.replace(/;/g, replace);
            break;
        case '`':
            subject = subject.replace(/`/g, replace);
            break;
        case ':':
            subject = subject.replace(/:/g, replace);
            break;
        case '-':
            subject = subject.replace(/-/g, replace);
            break;
        case '\\':
            subject = subject.replace(/\\/g, replace);
            break;
        case '/':
            subject = subject.replace(/\//g, replace);
            break;
        case '=':
            subject = subject.replace(/\=/g, replace);
            break;
        default:
            var oldRegex = new RegExp('{'+search+'}', "igm");
            subject = subject.replace(oldRegex, replace);
            break;
    }

    return subject;
}