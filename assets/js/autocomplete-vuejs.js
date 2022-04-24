new Vue({
    el: "#app-autocomplete-here",
    data: {
        here_id: '', // Important ! Permet de vous identifier avec l'API
        here_code: '', // Important ! Permet de vous identifier avec l'API
        inputCity : '', // Valeur du champ 'Ville'
        suggestionsHere: [], // Tableau qui contiendra les suggestions Here
        suggestionSelected : '' ,// Ville & Code postal sélectionnés
        geojson:'',
        response:'',
        savingSuccessful: false
    },
    methods: {
        onKeypressCity(e) {
            var value = this.inputCity;
            if(value=='') {
                this.response = '';
                this.geojson='';
                this.savingSuccessful= false;
            }

            if (value != undefined && value != '') {
                // Call API Suggestions de HERE pour réécupérer les informations
                fetch(`https://api-adresse.data.gouv.fr/search/?q=${value}&type=street&autocomplete=0`)
                    .then(result => result.json())
                    .then(result => {
                        var datas = [];

                        if (result.features && result.features.length > 0) {
                            result.features.map(function (sug) {
                                    datas.push({
                                        label: sug.properties.label,
                                        type: sug.properties.type,
                                        id: sug.properties.id,
                                        geojson: sug
                                    });
                            });

                            this.suggestionsHere = datas;
                            this.savingSuccessful=false;
                        }
                    }, error => {
                        console.error(error);
                    });
                this.suggestionsHere = [];
            } else {
                this.suggestionsHere = []
            }

        },
        onClickSuggestHere(suggestion) {
            // On renseigne l'adresse' sélectionner
            this.suggestionSelected = suggestion.label;
            let self = this;
            axios.post('php/create.php', suggestion)
                .then( function(responsee) {
                    self.savingSuccessful=true;
                self.response=responsee.data;
                });
            this.inputCity = suggestion.label;
            this.geojson= suggestion.geojson;
            this.suggestionsHere = [];
        }
    }
})
