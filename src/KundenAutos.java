import com.j256.ormlite.field.DatabaseField;
import com.j256.ormlite.table.DatabaseTable;

@DatabaseTable(tableName = "kunden_autos")
public class KundenAutos {
    @DatabaseField(columnName = "kunde_id", foreign = true, canBeNull = false)
    private Kunde kunde;

    @DatabaseField(columnName = "auto_id", foreign = true, canBeNull = false)
    private Auto auto;

    // Standard-Konstruktor für ORMLite
    public KundenAutos() {
    }

    public KundenAutos(Kunde kunde, Auto auto) {
        this.kunde = kunde;
        this.auto = auto;
    }

    // Getter und Setter
    public Kunde getKunde() {
        return kunde;
    }

    public void setKunde(Kunde kunde) {
        this.kunde = kunde;
    }

    public Auto getAuto() {
        return auto;
    }

    public void setAuto(Auto auto) {
        this.auto = auto;
    }
}
