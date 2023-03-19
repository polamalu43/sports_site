import 'bootstrap/dist/css/bootstrap.min.css';
import StandingDataTable from '../Components/Molecules/StandingDataTable';
import React from 'react';

const Index: React.FC = () => {
  type Table = { id: number; first: string; last: string; email: string };

  const datas: Table[] = [
    {
      id: 3,
      first: 'aaa',
      last: 'AAA',
      email: '!!!',
    },
    {
      id: 4,
      first: 'bbb',
      last: 'BBB',
      email: '!!!',
    },
    {
      id: 3,
      first: 'aaa',
      last: 'AAA',
      email: '@@@',
    },
    {
      id: 3,
      first: 'aaa',
      last: 'AAA',
      email: '@@@',
    },

  ];

  return (
    <>
      <StandingDataTable<Table> datas={datas}/>
    </>
  )
}

export default Index;
