<template>
  <button
    @click="getMovementsFromEarth()"
    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
  >
    Get Movements
  </button>
  <ul class="list-reset flex flex-col">
    <li
      v-for="item in movements"
      class="rounded-t relative -mb-px block border p-4 border-grey"
    >
      {{ item }}
    </li>
  </ul>

  <button
    @click="getCoordinatesFromMovements(movements)"
    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
  >
    Get Coordinates
  </button>

  <div class="w-full bg-white rounded-lg shadow-lg lg:w-1/3">
    <ul class="list-reset flex flex-col">
      <li
        v-for="item in coordinates"
        class="rounded-t relative -mb-px block border p-4 border-grey"
      >
        {{ item.type }}->{{ item.movement }}
      </li>
    </ul>
  </div>
</template>

<script>
import useMovements from "../../composables/movements";

export default {
  setup() {
    const { movements, getMovements, coordinates, getCoordinates } =
      useMovements();

    const getMovementsFromEarth = async () => {
      await getMovements();
    };

    const getCoordinatesFromMovements = async (data) => {
      await getCoordinates(data);
    };

    return {
      movements,
      coordinates,
      getCoordinatesFromMovements,
      getMovementsFromEarth,
    };
  },
};
</script>