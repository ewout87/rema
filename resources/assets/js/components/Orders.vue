<template>
	<div class="page-content browse container-fluid">
        <table id="dataTable" class="table table-hover">
            <thead>
                <tr>
                    <th>Datum</th>                    
                    <th>Klant</th>
                    <th>Producten<span style="float : right">Maat : # geleverd / # besteld</span></th>
                    <th>Bedrukking</th>
                    <th>Status</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <form>
                        <td>
                            <input type="date" v-model="order.datum">
                        </td>
                        <td>
                            <input type="text" v-model="order.klant">
                        </td>
                        <td>
                            <div v-for="product in order.products" :key="product.id">{{ product.brand.naam }} {{ product.omschrijving }} 
                            <span class="badge badge-success" style="float : right" v-for="size in product.sizes" :key="size.id" v-if="size.aantal_geleverd == size.aantal_besteld">{{ size.maat }} : {{size.aantal_geleverd}} / {{size.aantal_besteld}}</span>
                            <span class="badge badge-secondary" style="float : right" v-for="size in product.sizes" :key="size.id" v-if="size.aantal_geleverd != size.aantal_besteld">{{ size.maat }} : {{size.aantal_geleverd}} / {{size.aantal_besteld}}</span>
                            <hr>
                            </div>
                        </td>
                        <td>
                            <input type="checkbox" v-model="order.print_id">
                        </td>
                        <td>
                            <select v-model="order.status">
                                <option selected>{{ status[order.status] }}</option>
                                <option v-for="(value, key) in status" >{{ value }}</option>
                            </select>
                        </td>
                        <td>
                            <button class="btn btn-primary btn-sm" @click="">Bewaren</button>
                        </td>
                    </form>
                </tr>
                <tr v-for="order in orders" :key="order.id" v-show="!isEditing">
                   	<td>
                        <div>{{ order.datum }}</div>
                    </td>
                    <td>
                        <div>{{ order.klant }}</div>
                        <div>{{ order.contact }}</div>
                    </td>
                    <td>
                    	<div v-for="product in order.products" :key="product.id">{{ product.brand.naam }} {{ product.omschrijving }} 
                    		<span class="badge badge-success" style="float : right" v-for="size in product.sizes" :key="size.id" v-if="size.aantal_geleverd == size.aantal_besteld">{{ size.maat }} : {{size.aantal_geleverd}} / {{size.aantal_besteld}}</span>
                            <span class="badge badge-secondary" style="float : right" v-for="size in product.sizes" :key="size.id" v-if="size.aantal_geleverd != size.aantal_besteld">{{ size.maat }} : {{size.aantal_geleverd}} / {{size.aantal_besteld}}</span>
                            <hr>
                    	</div>
                    </td>
                    <td>
                        <div>{{ print[order.print_id] }}</div>
                    </td>
                    <td>
                        <div>{{ status[order.status] }}</div>
                    </td>
                    <td><button class="btn btn-primary btn-sm" @click="editOrder"><i class="voyager-edit"></i> Bijwerken</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
	export default {
		data() {
	      	return {
                isEditing : false,
                inProcess : true,
                isProcessed : true,
                order : {
                    print_id: null,
                    klant: null,
                    contact: null,
                    opmerking: null,
                    datum: null,
                    status: null,
                },
	      		orders : [], 
                print : ['nee', 'ja'],
                status : ['te bestellen', 'besteld', 'geleverd']          
	      	}
	    },
	    created() {
	    	this.fetchOrders();
	    },

	    methods : {  
	    	fetchOrders() {
                axios.get('api/orders')
                .then(({data}) => {
                    this.orders = data.data;
                })
                .catch(error => console.log(error.response));
            },
            editOrder (order) {
                this.isEditing = true;
                this.order.id = order.id;
                this.order.klant = order.klant;
            },
            updateOrder () {
              axios.put('api/orders/'.this.order.id, this.order)
                .catch(error => console.log(error.response));
                this.saved = true;
            },
	    }
	    
	}
</script>