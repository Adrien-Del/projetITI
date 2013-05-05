var quantity = 1;

$(function(){ //DOM Ready
 
    $(".gridster ul").gridster({
        widget_margins: [10, 10],
        widget_base_dimensions: [140, 200],
        max_size_x: 4
    });
    
    getElements();
 

});


//Fonction pour afficher le nom des items + prix + prix total
function getElements() {
    var texte = "veuillez choisir un article";
    var prixTotal = 0;
    if($('li[data-col=1]'.length)!=0){
      texte = "<table class=\"table table-striped\"><tr><th>Produit<th/><th>Quantité</th><th>Prix<th/><tr/>";
      for (var i = 0;i < $('li[data-col=1]').length;i++){
        var nombre =1;
        var id = $('li[data-col=1]').eq(i).attr("baseid");
        var un =  $('#'+id).val();
        if(un=="") {un=1;}
        var deux = parseFloat($('li[data-col=1]').eq(i).attr("prix"));
        nombre = Number((un*deux).toFixed(1));
        texte += '<tr class=\"success\"><td><strong>' + ($('li[data-col=1]').eq(i).attr("nom-produit")) + '</strong><td/><td>'+un+'</td><td>' + nombre + '\u20ac <td/><tr/>';
        prixTotal += parseFloat(nombre);
        
      }
      
      texte += "</table><br/><strong> PrixTotal " + prixTotal + ' \u20ac</strong>';
      $('#resume').html(texte);
    }
  };
  
  
function passerCommande() {
    var texte = $('#resume').html();
    $('#modalhtml').html(texte);
    $('#contenuCommande').val(texte);
}