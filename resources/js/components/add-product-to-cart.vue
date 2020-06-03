<template>
  <div class="container mt-1 mb-3">


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Ajouter au panier
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ajouter au panier</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <p>Choisissez le nombre d'articles que vous souhaitez commander</p>
            <select name="nbArticles" class="custom-select" v-model="name">
              <option selected>Choisir ...</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="button" class="btn btn-primary" @click="addToCart">Valider</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
    export default {
        data() {
          return {
            name: ""
          }
        },

        methods: {
            addToCart(){

            }
        }
    }
</script>
