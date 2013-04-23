$(function(){ //DOM Ready
 
    $(".gridster ul").gridster({
        widget_margins: [10, 10],
        widget_base_dimensions: [140, 140]
    });
 
});


//Fonction pour afficher le nom des items + prix + prix total
function getElements() {
    var texte = "veuillez choisir un article";
    var prixTotal = 0;
    if($('li[data-col=1]'.length)!=0){
      texte = "<table><tr><th>Produit<th/><th>Prix<th/><tr/>";
      for (var i = 0;i < $('li[data-col=1]').length;i++){
        texte += '<tr><td><strong>' + ($('li[data-col=1]').eq(i).attr("nom-produit")) + '</strong><td/><td>' + ($('li[data-col=1]').eq(i).attr("prix")) + ' \u20ac <td/><tr/>';
        prixTotal += parseFloat($('li[data-col=1]').eq(i).attr("prix"));
      }
      texte += "</table><br/><strong> PrixTotal " + prixTotal + ' \u20ac</strong>';
      $('#resume').html(texte);
    }
  };