<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    form{
        width: 370px;
        height: 800px;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
    }
    .champs{

        height: 520px;;

    }
    input{
        border-radius: 50px;
    }
</style>
<body>




<section class="d-flex justify-content-center ">
    <form action="" class="border px-3 py-2 my-5  shadow-sm " style="border-radius: 30px;"> 
        <h2 class="text-center ">Creation compte</h2>

        <div class="  champs d-flex flex-column justify-content-around">
        <div>
            <label for="inputPassword5" class="form-label " >Nom de l'ecole</label>
            <input type="text" id="inputPassword5" class="form-control py-3"  aria-describedby="passwordHelpBlock">
        </div>
        <div>
            <label for="inputPassword5" class="form-label  "> Province </label>
            <input type="text" id="inputPassword5" class="form-control py-3 "  aria-describedby="passwordHelpBlock">
        </div>
        <div>
            <label for="inputPassword5" class="form-label ">Code ecole </label>
            <input type="text" id="inputPassword5" class="form-control py-3"  aria-describedby="passwordHelpBlock">
        </div>
        <div>
            <label for="inputPassword5" class="form-label "> Mots de passe</label>
            <input type="text" id="inputPassword5" class="form-control py-3"  aria-describedby="passwordHelpBlock">
        </div>
        <div>
            <label for="inputPassword5" class="form-label "> Confirmer le mots  de passe</label>
            <input type="text" id="inputPassword5" class="form-control py-3"  aria-describedby="passwordHelpBlock">
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="option2">
            <label class="form-check-label" for="option2">
                Accepter les conditions d'utilisation.
            </label>
        </div>
     
      

       

        </div>


        <div class="btn btn-primary  py-3" style="  color:white;">Créé</div>

        <div class="text-center  " style="font-size: 20px;">  Avez-vous déjà un compte ? <span style="color: blue;"> Connexion</span> </div>
    </form>
    

</section>








    
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</html>