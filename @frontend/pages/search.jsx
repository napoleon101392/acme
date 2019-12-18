import React from 'react'
import Head from 'next/head'
import Error from 'next/error'
import Nav from '../components/nav'
import { isLoggedIn, getRandomLatLng, searchNearbyStops } from '../components/api';

class Search extends React.Component {
  constructor(props) {
    super(props);

    this.state = {
      nearbyStops: [],
      latitude: null,
      longitude: null,
    };

    this.formSubmit = this.formSubmit.bind(this);
  }

  inputChange = (e) => {
    this.setState((state, props) => ({
      [e.target.name]: e.target.value,
    }));
  }

  formSubmit = async (e) => {
    e.preventDefault();

    const rand = await getRandomLatLng();

    const resolveNearbyStops = await searchNearbyStops(rand);

    const nearbyStops = Object.keys(resolveNearbyStops).map((key, idx) => {
      const record = resolveNearbyStops[key];

      return {
        name: record.name,
        latitude: record.latitude,
        longitude: record.longitude,
      }
    });


    this.setState(() => ({
      ...rand,
      nearbyStops,
    }));
  };

  render = () => {
    return (
      <div>
        <Head>
          <title>Search Page</title>
          <link rel="icon" href="/favicon.ico" />
        </Head>

        <Nav />

        {
          !this.props.authenticated ? (
            <Error statusCode="401" />
          ) : (
            <div className="hero">
              <div className="row">
                <div className="card">
                  <h5>Random Box</h5>
                  <form method="GET" onSubmit={this.formSubmit}>

                    <label>Latitude</label>
                    <input name="latitude" type="text" defaultValue={this.state.latitude} onChange={this.inputChange} />

                    <label>Longitude</label>
                    <input name="longitude" type="text" defaultValue={this.state.longitude} onChange={this.inputChange} />

                    <button  type="submit">Generate Random</button>
                  </form>
                </div>

                <div className="card">
                  <h5>Lists of Nearby</h5>
                  <ul>
                    {this.state.nearbyStops.map((el, key) => (
                      <li key={key}>
                        {el.name} -> {el.latitude}, {el.longitude}
                      </li>
                    ))}
                  </ul>
                </div>

              </div>
            </div>
          )
        }

        <style jsx>{`
          .hero {
            width: 100%;
            color: #333;
          }
          .title {
            margin: 0;
            width: 100%;
            padding-top: 80px;
            line-height: 1.15;
            font-size: 48px;
          }
          .title,
          .description {
            text-align: center;
          }
          .row {
            max-width: 880px;
            margin: 80px auto 40px;
            display: flex;
            flex-direction: row;
            justify-content: space-around;
          }
          .card {
            padding: 18px 18px 24px;
            width: 220px;
            text-align: left;
            text-decoration: none;
            color: #434343;
            border: 1px solid #9b9b9b;
          }
          .card:hover {
            border-color: #067df7;
          }
          .card h3 {
            margin: 0;
            color: #067df7;
            font-size: 18px;
          }
          .card p {
            margin: 0;
            padding: 12px 0 0;
            font-size: 13px;
            color: #333;
          }
        `}</style>
      </div>
    )
  }
}

Search.getInitialProps = async () => {
  return {
    authenticated: isLoggedIn(),
  }
}

export default Search;
