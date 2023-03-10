import { combineReducers, createStore } from "redux";
import { composeWithDevTools } from "redux-devtools-extension";
import rootReducer from "./reducers";

// Actions
// export const add = (title) => {
//   return {
//     type: "ADD",
//     payload: title,
//   };
// };

// export const del = (id) => {
//   return {
//     type: "DEL",
//     payload: id,
//   };
// };

// Reducer
// const initialState = {
//   todos: [
//     {
//       id: 1,
//       title: "This is Title",
//     },
//   ],
// };

// const listReducer = (state = initialState, action) => {
//   const { type, payload } = action;
//   switch (type) {
//     case "ADD":
//       const newItem = {
//         id: state.todos.length + 1,
//         title: payload,
//       };
//       return {
//         ...state,
//         todos: [...state.todos, newItem],
//       };
//     case "DEL":
//       return {
//         ...state,
//         todos: state.todos.filter((item) => item.id !== payload),
//       };
//     default:
//       return state;
//   }
// };

// const rootReducer = combineReducers({
//   lists: listReducer,
// });

const store = createStore(rootReducer, composeWithDevTools());

export default store;
