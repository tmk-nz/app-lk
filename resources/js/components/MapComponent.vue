<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div id="map" class="col-md-6">
                <l-map style="height: 100%; width: 100%" :zoom="zoom" :center="center" :options="{zoomControl: false}">
                    <l-tile-layer :url="url"></l-tile-layer>
                    <l-geo-json :geojson="geojson" :options="mapOptions"></l-geo-json>
                </l-map>
            </div>

            <div class="col-md-3">
                <div v-if="Object.keys(locationDetails).length">
                    <h2>{{ locationDetails.name }}</h2>
                    <table class="table table-striped table-hover table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">Name</th>
                          <th scope="col">Year</th>
                        </tr>
                      </thead>
                      <tbody>
                          <tr v-for="pub in locationDetails.publications">
                              <td>
                                  <a v-on:click.prevent="getPublicationDetails" :href="'/publications/' + pub.id">
                                      {{ pub.people[0].last_name }}
                                  </a>
                              </td>
                              <td>
                                  <a v-on:click.prevent="getPublicationDetails" :href="'/publications/' + pub.id">
                                      {{ pub.publication_year }}
                                  </a>
                              </td>
                          </tr>
                      </tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-3">
                <publication-details :info="publicationDetails"></publication-details>
            </div>
        </div>
    </div>

</template>

<script>
import {LMap, LTileLayer, LGeoJson} from 'vue2-leaflet';

export default {
    components: {LMap, LTileLayer, LGeoJson},
    data () {
        return {
          url: 'http://{s}.tile.osm.org/{z}/{x}/{y}.png',
          zoom: 13,
          center: [-45.824134, 170.642374],
          geojson: null,
          mapOptions: {
              onEachFeature: (feature, layer) => {
                  var self = this;
                  layer.on('click', function(e) {
                      self.getLocationDetails(feature.properties.id);
                  });
              }
          },
          locationDetails: {},
          publicationDetails: {}
      }
  },
  created () {
      axios.get('/locations?geoJSON=1').then((response) => {
          this.geojson = response.data;
      })
  },
  methods: {
      getLocationDetails(id) {
          // console.log(id)
          this.publicationDetails = {};
          axios.get('/locations/' + id).then((response) => {
              this.locationDetails = response.data;
          })
      },
      getPublicationDetails(event) {
          // console.log(event.target.href);
          axios.get(event.target.href).then((response) => {
              this.publicationDetails = response.data;
          })
      }
  }
}
</script>



<style>
#map {
    height:700px
}
</style>
