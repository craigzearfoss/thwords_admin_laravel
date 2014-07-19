
$(document).ready(function(){

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