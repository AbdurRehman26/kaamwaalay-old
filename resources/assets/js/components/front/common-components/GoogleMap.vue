<template>
    <div>
        <label>
            AutoComplete
            <GmapAutocomplete :position.sync="markers[0].position" @keyup.enter="usePlace" @place_changed="setPlace">
            </GmapAutocomplete>
            <button @click="usePlace">Add</button>
        </label>
        <br/>

        <gmap-map
        :center="center"
        :zoom="17"
        map-type-id="terrain"
        style="width: 100%; height: 500px"
        >
        <gmap-marker
        @dragend="updateMaker" 
        :key="index"
        v-for="(m, index) in markers"
        :position="m.position"
        :clickable="true"
        :draggable="true"
        @click="center=m.position"
        ></gmap-marker>

    </gmap-map>

</div>
</template>

<script>

    export default {
        data() {
            return {
                center: {lat: 10.0, lng: 10.0},
                markers: [{
                    position: {lat: 11.0, lng: 11.0}
                }],
                place: null,
            }
        },
        mounted (){
         this.geoLocation();
     },
     description: 'Autocomplete Example (#164)',
     methods: {
        geoLocation(){
            let self = this;
            navigator.geolocation.getCurrentPosition((position) => {
                this.center = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };

                self.markers[0] = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };


            });
        },
        setPlace(place) {
            this.place = place
        },
        setDescription(description) {
            this.description = description;
        },
        usePlace(place) {
            if (this.place) {
                var newPostion = {
                  lat: this.place.geometry.location.lat(),
                  lng: this.place.geometry.location.lng(),
              };
              this.center = newPostion;
              this.markers[0].position =  newPostion;
              this.place = null;
          }
      },
      updateMaker: function(event) {
          console.log('updateMaker, ', event.latLng.lat());
          this.place = 'Afghanistan';
          this.markers[0].position = {
            lat: event.latLng.lat(),
            lng: event.latLng.lng(),
        }
    },
}
}
</script>