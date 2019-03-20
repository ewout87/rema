<template>
    <span class="container">
        <h1 class="page-title"><i class="voyager-logbook"></i> Bestellingen</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success btn-add-new" data-toggle="modal" data-target="#exampleModal">
          Maak nieuwe bestelling
        </button>
        <div class="alert alert-success" v-if="saved">
          <strong>Yes!</strong> De bestelling werd aangemaakt.
        </div>
        <div class="alert alert-success" v-if="error">
          <strong>Oeps!</strong> Er is iets misgelopen.
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Nieuwe bestelling</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                <label for="klant">Klant</label>
                <input
                  type="text"
                  id="client_id"
                  class="form-control"
                  placeholder=""
                  v-model="order.client_id">
                </div>
                <div class="form-group">
                <label for="klant">Contactgegevens</label>
                <input
                  type="text"
                  id="client_id"
                  class="form-control"
                  placeholder=""
                  v-model="order.client_id">
                </div>
                <div class="form-group">
                <label for="klant">Datum</label>
                <input
                  type="date"
                  id="datum"
                  class="form-control"
                  v-model="order.datum">
                </div>
                <div class="form-group">
                  <label for="opmerking">Opmerking</label><br>
                  <textarea
                  id="opmerking"
                  rows="5"
                  class="form-control"
                  v-model="order.opmerking"   
                  ></textarea>
                </div>
                <div class="form-group">
                  <label for="status"></label>
                  <select 
                    id="status"
                    class="form-control"
                    v-model="order.status"
                    >
                    <option v-for="(value, key) in options" value="key">{{value}}</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="print_id">
                  <input
                    type="checkbox"
                    id="print_id"
                    value="1"
                    v-model="order.print_id"    
                    > Bedrukking
                  </label>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuleer</button>
                <button type="button" class="btn btn-primary" @click="createOrder">Bewaar</button>
              </div>
            </div>
          </div>
        </div>
    </span>
</template>

<script>
    export default {
        data () {
            return {
                order : {
                  print_id: null,
                  client_id: null,
                  opmerking: null,
                  datum: null,
                  status: null,
                },
                options: ["Te bestellen", "Besteld", "Geleverd"],
                saved: false,
                error: false
            }
        },

        methods: {
            createOrder () {
              axios.post('api/orders', this.order)
                .catch(error => console.log(error.response));
                this.saved = true;
            }
        }
    }
</script>