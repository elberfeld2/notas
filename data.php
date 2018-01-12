 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<?php 
var_dump(json_decode('[{"mensaje" :"nuevo grupo1 ","link" :"http//www.google.com","tipo":1,"ide":1},{"mensaje" :"nuevo grupo1 ","link" :"http//www.google.com","tipo":1,"ide":1},{"mensaje" :"nuevo grupo1 ","link" :"http//www.google.com","tipo":1,"ide":1}]'))
?>
 <script type="text/javascript">
 	$array=[[1,3],[2,7],[1,4],[2,6],[3,5],[3,2]];
 	
 	function calcularCosteEnvio(envio) {    
 		return sessionStorage.getItem('total'); 
 	}

 hay_cambio = function(e) {
    console.log("Dentro de la clave " + e.key + " el valor anterior era " + e.oldValue + ' y el nuevo es ' + e.newValue);
 }

if(window.addEventListener) {
    window.addEventListener('storage', hay_cambio, false);
} else {
    // Hay que soportar IE6, 7 y 8, lo lamento
    window.attachEvent('onstorage', hay_cambio);
}
localStorage.clave = "nuevo valor.";
$.each( { name: "Pere", lang: "JS" }, function(k, v){   alert( "Clave: " + k + ", Valor: " + v ); });


alert(calcularCosteEnvio(25))
sessionStorage.setItem('total',sessionStorage.getItem('total')+1); 
 	console.log($array.find(
        function (dato) { 
          if( dato[0]==2 && dato[1]==17)
          	return true;
          return false;
			}
 		)==undefined);
 	function ordenar2(dat,ind){
 		return dat.sort(
 			function (a,s){
 				return s[ind]-a[ind];
 			}
 		);

  }
 	function rellenar(dat) {
 		$nue=[]; 
 		ordenar2(dat,1);
   		ordenar2(dat,0);
 		for (var i = dat.length - 1; i >= 1; i--) {
 				$nodo=[];
 				$x1=dat[i];
 				$x2=dat[i-1];
 				for(var j=0;j<$x1.length;j++){
 					$nodo.push(($x1[j]+$x2[j])/2);
 				}
 				$nue.push($nodo);
 		}
 		ordenar2(dat,0);
   		ordenar2(dat,1);
 		for (var i = dat.length - 1; i >= 1; i--) {
 				$nodo=[];
 				$x1=dat[i];
 				$x2=dat[i-1];
 				for(var j=0;j<$x1.length;j++){
 					$nodo.push(($x1[j]+$x2[j])/2);
 				}
 				$nue.push($nodo);
 		}
 		for (var i = dat.length - 1; i >= 0; i--) {
 				$nue.push(dat[i]);
 		}
 		return $nue;
   }

	function ordenar(dat,ind){
		for (var j = $array.length - 1; j >= 0; j--)
		for (var i = $array.length - 1; i >= 1; i--) {
 				if($array[i][ind]<$array[i-1][ind]){
 					$aux=$array[i];
 					$array[i]=$array[i-1];
 					$array[i-1]=$aux;
 				}
 					
 		}
 	}
  
   
   	console.log(rellenar(rellenar(rellenar($array))));
 </script>
