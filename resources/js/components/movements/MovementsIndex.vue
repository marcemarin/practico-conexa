<template>
  <div class="row g-3">
    <div class="col-md-6">
      <button @click="getMovementsFromEarth()" class="btn btn-dark">
        Get movements
      </button>
    </div>
    <div class="col-md-6">
      <button
        class="btn btn-dark"
        @click="getCoordinatesFromMovements(movements)"
      >
        Get Coordinates
      </button>
    </div>
    <div class="col-md-6">
      <ul class="list-group">
        <li v-for="item in movements" class="list-group-item">
          {{ item }}
        </li>
      </ul>
    </div>
    <div class="col-md-6">
      <ul class="list-group">
        <li
          v-for="item in coordinates"
          class="list-group-item align-items-center"
        >
          <span class="badge bg-primary rounded-pill">{{ item.movement }}</span>
        </li>
      </ul>
    </div>
  </div>

  <!-- <div class="row">
    <div class="col-6 col-sm-3">
      <button @click="getMovementsFromEarth()" class="btn btn-primary">
        Get Movements
      </button>
      <ul class="list-group">
        <li v-for="item in movements" class="list-group-item">
          {{ item }}
        </li>
      </ul>
    </div>
    <div class="col-6 col-sm-3">
      <button
        @click="getCoordinatesFromMovements(movements)"
        class="btn btn-primary"
      >
        Get Coordinates
      </button>

      <ul class="list-group">
        <li
          v-for="item in coordinates"
          class="
            list-group-item
            d-flex
            justify-content-between
            align-items-center
          "
        >
          <span class="badge bg-primary rounded-pill">{{ item.movement }}</span>
        </li>
      </ul>
    </div>
  </div> -->
</template>

<script>
import { onMounted } from "@vue/runtime-core";
import useMovements from "../../composables/movements";

export default {
  setup() {
    const { movements, getMovements, coordinates, getCoordinates } =
      useMovements();

    onMounted(getMovements);

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