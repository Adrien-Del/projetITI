var quantity = 1;

$(function(){ //DOM Ready
 
    $(".gridster ul").gridster({
        widget_margins: [10, 10],
        widget_base_dimensions: [140, 200]
    });
 
});


//Fonction pour afficher le nom des items + prix + prix total
function getElements() {
    var texte = "veuillez choisir un article";
    var prixTotal = 0;
    if($('li[data-col=1]'.length)!=0){
      texte = "<table><tr><th>Produit<th/><th>Prix<th/><tr/>";
      for (var i = 0;i < $('li[data-col=1]').length;i++){
        var nombre =1;
        var id = $('li[data-col=1]').eq(i).attr("baseid");
        var un =  $('#'+id).val();
        if(un=="") {un=1;}
        console.log(un);
        var deux = parseFloat($('li[data-col=1]').eq(i).attr("prix"));
        nombre = Number((un*deux).toFixed(1));
        texte += '<tr><td><strong>' + ($('li[data-col=1]').eq(i).attr("nom-produit")) + '</strong><td/><td>' + nombre + '\u20ac <td/><tr/>';
        prixTotal += parseFloat(nombre);
        //$('li[data-col=1]').eq(i).$('p').html("Allo");
        
      }
      
      texte += "</table><br/><strong> PrixTotal " + prixTotal + ' \u20ac</strong>';
      $('#resume').html(texte);
    }
  };
  
  
