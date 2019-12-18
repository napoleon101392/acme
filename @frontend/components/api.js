const API_HOST = 'http://localhost:8001';

export const searchNearbyStops = async ({ latitude, longitude }) => {
  const res = await fetch(`${API_HOST}/api/stops?latitude=${latitude}&longitude=${longitude}`, {
    headers: {
      Accept: 'application/json',
    }
  });

  return await res.json();

  // return [
  //   {
  //     name: 'Bus A',
  //     lat: '1.330913',
  //     lng: '103.876913',
  //   },
  //   {
  //     name: 'Bus B',
  //     lat: '1.330915',
  //     lng: '103.876915',
  //   },
  //   {
  //     name: 'Bus C',
  //     lat: '1.330921',
  //     lng: '103.876921',
  //   },
  //   {
  //     name: 'Bus D',
  //     lat: '1.330925',
  //     lng: '103.876925',
  //   },
  // ];
}

export const getRandomLatLng = async () => {
  const res = await fetch(`${API_HOST}/api/random-location`, {
    headers: {
      Accept: 'application/json',
    }
  });

  return (await res.json()).content;
}

export const loginAttempt = async (email, password) => {
  // const res = await fetch.post('https://api.github.com/repos/zeit/next.js', { ... });
  // return await res.json();

  // @TODO: call api using fetch
  // @TODO: store the access token inside local storage

  return true;
}

export const isLoggedIn = () => {
  // if (global.window) {
  //   const token = localStorage.getItem('access_token');
  //
  //   if (!token) {
  //     console.log('No access_token found');
  //
  //     return false;
  //   }
  // }

  return true;
}
