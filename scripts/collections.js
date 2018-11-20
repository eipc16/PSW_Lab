function collection(stype) {
  var collection = document.getElementById('collection');
  var type = collection.options[collection.selectedIndex].value;

  var holder = document.getElementById('selected-holder');

  while(holder.firstChild)
    holder.removeChild(holder.firstChild);

  if(stype === 'id') {
    var id = document.getElementById('collection_id').value;
    holder.appendChild(get_collection_id(type, id).cloneNode(true));
  } else {
    var index = document.getElementById('collection_index').value;
    holder.appendChild(get_collection_index(type, index).cloneNode(true));
  }

}

function get_collection_id(type, id) {
  if(type === "img"){
    return document.images.namedItem("main");
  } else if (type === "forms") {
    return document.forms.namedItem(id);
  } else if (type === "links") {
    return document.links.namedItem(id);
  } else if (type === "anchors") {
    return document.anchors.namedItem(id);
  } else {
    return null;
  }
}

function get_collection_index(type, index) {
  if(type === "img"){
    return document.images.item(index);
  } else if (type === "forms") {
    return document.forms.item(index);
  } else if (type === "links") {
    return document.links.item(index);
  } else if (type === "anchors") {
    return document.anchors.item(index);
  } else {
    return null;
  }
}
