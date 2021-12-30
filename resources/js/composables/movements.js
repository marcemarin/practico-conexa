import axios from "axios";
import { ref } from "vue";

export default function useMovements() {
    const movements = ref([])
    const coordinates = ref([])

    const getMovements = async () => {
        let response = await axios.get("/api/earth")

        movements.value = response.data;

    }

    const getCoordinates = async (data) => {

        let response = await axios.post("/api/final-position", { initial: [0, 0], items: data })
        console.log(response.data)
        coordinates.value = response.data.data;

   }

    return {
        coordinates,
        movements,
        getMovements,
        getCoordinates
    }
}