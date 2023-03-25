import { Table } from 'react-bootstrap';
import { generateUniqueKey } from '../../../utils/Common';

interface Props<T> {
  datas: T[];
  subtitle: string | null;
}

const StandingDataTable = <T extends object>({ datas, subtitle }: Props<T>): JSX.Element => {
  const keys: string[] | number[] = Object.keys(datas[0]);

  return (
    <div className='basic_table_for_team_data'>
      { subtitle ? <div className='standing_subtitle'>{subtitle}</div> : '' }
      <div  className={ !subtitle ? 'margin_t40px' : ''}>
        <Table striped bordered hover>
          <thead>
            <tr>
              {
                keys.map(( key ) => (
                  <th
                    key={ generateUniqueKey() }
                  >
                    { key }
                  </th>
                ))
              }
            </tr>
          </thead>
          <tbody>
            {
              datas.map(( data ) => (
                <tr key={ generateUniqueKey() }>
                  {
                    Object.values(data).map(( value, index ) => (
                      <td
                        key={ generateUniqueKey() }
                        className={index >= 1 ? "text_align_right" : ""}
                      >
                        {index === 0 ? <a href='/'>{value}</a> : value}
                      </td>
                    ))
                  }
                </tr>
              ))
            }
          </tbody>
        </Table>
      </div>
    </div>
  );
}

export default StandingDataTable;
