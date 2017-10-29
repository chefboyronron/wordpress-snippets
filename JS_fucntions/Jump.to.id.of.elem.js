var URIhash = window.location.hash;
var id = URIhash.substr(1);
if (document.location.hash){
    document.location.hash = id;
}